@if (flash()->exists())
    <div class="flash notification is-{{ flash()->level }}" style="border-radius: 0">
        {{ flash()->message }}
    </div>
@endif
