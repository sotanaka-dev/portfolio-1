<?php

/* 商品詳細ページの画像切り替え機能 */

namespace App\Http\Livewire;

use Livewire\Component;

class SwitchProductImage extends Component
{
    private const START_VALUE_OF_INDEX = 0;
    private const DIFF_BTW_COUNT_AND_INDEX = 1;
    private const REGEX_FOR_ALL_FILES = '*.*';

    public $product;
    public $prefix = 'tmb_';
    public $tmb_index = self::START_VALUE_OF_INDEX;
    public $main_image_path;

    public function mount()
    {
        $this->image_paths = glob($this->product->path . self::REGEX_FOR_ALL_FILES);
        $this->max_length  = count($this->image_paths) - self::DIFF_BTW_COUNT_AND_INDEX;
    }

    public function render()
    {
        $this->replacementMainImage();

        return view('livewire.switch-product-image');
    }

    private function replacementMainImage()
    {
        $this->main_image_path = $this->image_paths[$this->tmb_index];
    }
}
