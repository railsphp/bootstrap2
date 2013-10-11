<?php
namespace Rails\Bootstrap2;

/**
 * Helper for Bootstrap 2.3
 */
class ViewHelper extends \Rails\ActionView\Helper
{
    public function btnLinkTo($text, $url, $color = null, array $attrs = [])
    {
        if (is_array($color)) {
            $attrs = $color;
        } elseif ($color) {
            $this->ensureArray($attrs);
            $attrs['class'][] = $this->btnColorToClass($color);
        }
        
        $attrs['class'][] = 'btn';
        
        return $this->linkTo($text, $url, $attrs);
    }
    
    public function blackIcon($name, array $attrs = [])
    {
        return $this->contentTag('i', '', array_merge_recursive($attrs, ['class' => 'icon-' . $name]));
    }
    
    public function whiteIcon($name, array $attrs = [])
    {
        return $this->contentTag('i', '', array_merge_recursive($attrs, ['class' => 'icon-white icon-' . $name]));
    }
    
    public function lTextField($model, $property, array $attrs = [])
    {
        return $this->base()->textField($model, $property, array_merge_recursive($attrs, ['class' => ['input-large']]));
    }
    
    public function xlTextField($model, $property, array $attrs = [])
    {
        return $this->base()->textField($model, $property, array_merge_recursive($attrs, ['class' => ['input-xlarge']]));
    }
    
    public function xxlTextField($model, $property, array $attrs = [])
    {
        return $this->base()->textField($model, $property, array_merge_recursive($attrs, ['class' => ['input-xxlarge']]));
    }
    
    public function btn($text, $color = null, array $attrs = [])
    {
        if (is_string($color) || $attrs) {
            $this->ensureArray($attrs);
            $attrs['class'][] = $this->btnColorToClass($color);
        } elseif (is_array($color)) {
            $attrs = $color;
            $this->ensureArray($attrs);
            $attrs['class'][] = 'btn-default';
        }
        $attrs['class'][] = 'btn';
        if (empty($attrs['type'])) {
            $attrs['type'] = 'button';
        }
        return $this->contentTag('button', $text, $attrs);
    }
    
    public function submitBtn($text, $color = null, array $attrs = [])
    {
        if (is_array($color)) {
            $color['type'] = 'submit';
        } else {
            $attrs['type'] = 'submit';
        }
        return $this->btn($text, $color, $attrs);
    }
    
    protected function ensureArray(&$arr, $index = 'class')
    {
        if (isset($arr[$index])) {
            $arr[$index] = (array)$arr[$index];
        } else {
            $arr[$index] = [];
        }
    }
    
    protected function btnColorToClass($color)
    {
        switch ($color) {
            case 'blue':
                return 'btn-primary';
            case 'red':
                return 'btn-danger';
            case 'orange':
                return 'btn-warning';
            case 'green':
                return 'btn-success';
            case 'aqua':
                return 'btn-info';
            case 'black':
                return 'btn-inverse';
        }
    }
}
