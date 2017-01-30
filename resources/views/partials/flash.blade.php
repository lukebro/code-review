@if (flash()->exists())
    <div class="flash notification is-{{ flash()->level }}" style="border-radius: 0">
	    <button class="delete"></button>
        {{ flash()->message }}
    </div>
@endif
