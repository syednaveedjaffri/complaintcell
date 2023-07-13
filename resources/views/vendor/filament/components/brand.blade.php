<style>
    .avatar {
        vertical-align: middle;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
        display: flex;
        align-content: center;
        place-content: center;
        align-self: center;
        justify-self: center;
        place-self: center;
    }

    .avatar1 {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
        display: flex;
        align-content: center;
        place-content: center;
        align-self: center;
        justify-self: center;
        place-self: center;
    }
</style>
<div style=";background-color: #990100;" class="@if(!auth()->user()) avatar @else avatar1 @endif">
    <img
         src="{{ asset('images/new-logo.png') }}">
</div>
