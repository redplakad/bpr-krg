<div>
    @if($showRegisterButton)
        <button wire:click="handleRegistration">Register Team</button>
    @else
        <p>Anda tidak memiliki izin untuk membuat tim.</p>
    @endif
</div>