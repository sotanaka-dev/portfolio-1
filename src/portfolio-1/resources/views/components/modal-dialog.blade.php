{{-- USAGE:
    呼び出し元のビュー内で、呼び出し個所の親タグに x-data="{ open: false }" を宣言
    呼び出し元のコンポーネント内に pressedExecBtn() を宣言し、ダイアログで実行を押下した後の処理を記述 --}}

<div x-cloak x-show="open" x-transition.opacity.scale.120.duration.300ms class="full-overlay">
    <div x-on:click.outside="open=false" class="modal-dialog">
        <p class="modal-dialog__message">
            {{ $message }}
        </p>
        <div class="modal-dialog__btn-wrap">
            <button wire:click="pressedExecBtn" x-on:click="open=false" class="modal-dialog__exec link">実行</button>
            <button x-on:click="open=false" class="modal-dialog__cancel link">キャンセル</button>
        </div>
    </div>
</div>
