<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
</head>
<body>
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Supprimer son compte') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Une fois que votre compte est supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6">
        @csrf
        @method('delete')

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Supprimer son compte') }}</x-primary-button>

            @if (session('status') === 'account-deleted')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Votre compte a été supprimé avec succès.') }}</p>
            @endif
        </div>
    </form>
</section>
</body>
</html>
