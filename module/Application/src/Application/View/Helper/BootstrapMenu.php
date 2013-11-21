<?php
/**
 * Website Zend\Together
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.zf-together.com
 */

/**
 * namespace definition and usage
 */
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Bootstrap menu output
 *
 * Extends the normal navigation menu rendered html for Twitter Bootstrap menus
 *
 * @package    Application
 */
class BootstrapMenu extends AbstractHelper
{
    /**
     * get rendered menu and adds dropdown markup
     *
     * @param string $html
     *
     * @return string
     */
    public function __invoke($html)
    {
        $domDoc = new \DOMDocument('1.0', 'utf-8');
        $domDoc->loadXML('<?xml version="1.0" encoding="utf-8"?>' . $html);

        $xpath = new \DOMXPath($domDoc);

        foreach ($xpath->query('//a[starts-with(@href, "#")]') as $item) {
            $result = $xpath->query('../ul', $item);

            if ($result->length === 1) {
                $ul = $result->item(0);
                $ul->setAttribute('class', 'dropdown-menu');

                $li = $item->parentNode;
                $li->setAttribute('id', substr($item->getAttribute('href'), 1));

                if (($existingClass = $li->getAttribute('class')) !== '') {
                    $li->setAttribute('class', $existingClass . ' dropdown');
                } else {
                    $li->setAttribute('class', 'dropdown');
                }

                $item->setAttribute('data-toggle', 'dropdown');

                if (($existingClass = $item->getAttribute('class')) !== '') {
                    $item->setAttribute('class', $item->getAttribute('class') . ' dropdown-toggle');
                } else {
                    $item->setAttribute('class', 'dropdown-toggle');
                }

                $space = $domDoc->createTextNode(' ');

                $item->appendChild($space);

                $caret = $domDoc->createElement('b', '');
                $caret->setAttribute('class', 'caret');

                $item->appendChild($caret);
            }
        }

        return $domDoc->saveXML($xpath->query('/ul')->item(0), LIBXML_NOEMPTYTAG);
    }
}
