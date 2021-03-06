<?php

namespace Lelesys\Common\NeosProject\DataSource;

use Neos\Flow\Annotations as Flow;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\ContentRepository\Domain\Model\NodeInterface;

/**
 * Class ContentCssClasses
 */
class ContentCssClasses extends AbstractDataSource
{
    /**
     * @var string
     */
    static protected $identifier = 'lelesys-common-neosproject-content-css-classes';

    /**
     * @Flow\InjectConfiguration
     * @var array
     */
    protected $settings;

    /**
     * Get data
     *
     * @param NodeInterface $node The node that is currently edited (optional)
     * @param array $arguments Additional arguments (key / value)
     * @return array JSON serializable data
     */
    public function getData(NodeInterface $node = null, array $arguments)
    {
        $out = array();
        if (isset($arguments['keys'])) {
            if (! is_array($arguments['keys'])) {
                return $out;
            }
            foreach ($arguments['keys'] as $singleKey) {
                if (isset($this->settings['contentCssClasses'][$singleKey])) {
                    $out = array_merge($out, $this->settings['contentCssClasses'][$singleKey]);
                }
            }
            return $out;
        }
        foreach ($this->settings['contentCssClasses'] as $value) {
            $out = array_merge($out, $value);
        }
        return $out;
    }
}