@if (flash()->exists())
    <div class="notification is-{{ flash()->level }}" style="border-radius: 0">
        {{ flash()->message }}
    </div>
@endif
