
<div style="margin-bottom: 3em">
    <style>

    </style>
    <div style="display: flex">
        <button wire:click="increment">+</button>
        <h2>{{$count}}</h2>
        <button wire:click="decrement">-</button>
    </div>


    <div style="display: block; margin-bottom:2em; width: 50%">
        @for($i = 0; $i < $count; $i++)
            <x-input  label="Descricao"  placeholder="your name" />
        @endfor
    </div>

</div>

