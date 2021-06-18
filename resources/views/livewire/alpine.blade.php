{{-- Las view de Livewire SIEMPRE deben estar encerradas en un solo div padre, no puede haber mas de uno --}}
<div>

	<p>Count de livewire: {{ $count }}</p>

	<button wire:click="incrementar">
		Aumentar desde Livewire
	</button>
	<br><br>

	<div x-data="{ count: $wire.count }">	{{-- defino 'count' de alpine con el valor INICIAL de la vble 'count' de livewire --}}
		
		<p>
			Count dentro de Alpine (con $wire.count)
			<span x-text="count"></span>		{{-- imprimo 'count' de alpine --}}
		</p>

		<button @click="count++">
			Aumentar
		</button>
	</div>
	<br>
 
	<div x-data="{ count: @entangle('count') }">	{{-- defino 'count' CABLEADA(ida y vuelta) a la vble 'count' de livewire, de tal forma que los cambios son bi-direccionales, estan espejadas--}}
		
		<p>
			Count dentro de Alpine (con entangle('count'))
			<span x-text="count"></span>		{{-- imprimo 'count' de alpine --}}
		</p>

		<button @click="count++">
			Aumentar
		</button>
	</div>
	<br>
	
	<div x-data="{ count: @entangle('count').defer }">	{{-- defino 'count' CABLEADA(ida y vuelta) a la vble 'count' de livewire, pero los cambios internos son retenidos y no refrescan la vble de livewire hasta que se ejecuta cualquier  metodo del componente de livewire--}}
		
		<p>
			Count dentro de Alpine (con entangle('count').defer)
			<span x-text="count"></span>		{{-- imprimo 'count' de alpine --}}
		</p>

		<button @click="count++">
			Aumentar
		</button>
	</div>

</div>
