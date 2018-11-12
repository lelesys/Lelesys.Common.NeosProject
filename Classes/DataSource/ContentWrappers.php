<?php

namespace Lelesys\Common\NeosProject\DataSource;

use Neos\Flow\Annotations as Flow;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\ContentRepository\Domain\Model\NodeInterface;

/**
 * Class ContentCssClasses
 */
class ContentWrappers extends AbstractDataSource
{
    /**
     * @var string
     */
    static protected $identifier = 'lelesys-common-neosproject-content-wrappers';

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
                if (isset($this->settings['contentWrappers'][$singleKey])) {
                    $out = array_merge($out, $this->settings['contentWrappers'][$singleKey]);
                }
            }
            return $out;
        }
        foreach ($this->settings['contentWrappers'] as $value) {
            $out = array_merge($out, $value);
        }
        return $out;
    }
}