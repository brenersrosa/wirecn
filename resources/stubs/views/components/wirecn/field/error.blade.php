{{--
    Erros de validação (Laravel / Livewire), alinhado ao uso de @error:

    - Chave no saco da view (recomendado, equivalente a @error('form.name')):
      <x-wirecn.field.error name="form.name" />
      ou <x-wirecn.field.error for="form.name" />

    - Saco explícito (ex.: bag passado ao componente):
      <x-wirecn.field.error name="form.name" :errors="$errors" />

    - Mensagens manuais / API:
      <x-wirecn.field.error :errors="['Ocorreu um problema']" />

    - Slot (markup livre, p.ex. @error manual):
      <x-wirecn.field.error>@error('form.name')<p>...</p>@enderror</x-wirecn.field.error>

    Para realçar o campo, use no <x-wirecn.field> :invalid="$errors->has('form.name')" (ou @error em variável).
--}}
@props([
    'errors' => null,
    'name' => null,
    'for' => null,
])

@php
    $errorKey = filled($for ?? null)
        ? (string) $for
        : (filled($name ?? null)
            ? (string) $name
            : null);

    $uniqueMessages = [];

    $errorsIsBag =
        $errors instanceof \Illuminate\Support\ViewErrorBag
        || $errors instanceof \Illuminate\Contracts\Support\MessageBag;

    if (filled($errorKey) && $errorsIsBag) {
        $raw = $errors->get($errorKey);

        foreach (\Illuminate\Support\Arr::wrap($raw) as $msg) {
            if (is_string($msg) && $msg !== '') {
                $uniqueMessages[$msg] = $msg;
            }
        }

        $uniqueMessages = array_values($uniqueMessages);
    } elseif (is_iterable($errors) && ! $errorsIsBag) {
        foreach ($errors as $error) {
            $message = null;

            if (is_string($error)) {
                $message = $error;
            } elseif (is_array($error)) {
                $message = $error['message'] ?? null;
            } elseif (is_object($error) && isset($error->message)) {
                $message = $error->message;
            }

            if ($message !== null && $message !== '') {
                $uniqueMessages[$message] = $message;
            }
        }

        $uniqueMessages = array_values($uniqueMessages);
    }
@endphp

@if ($slot->isNotEmpty())
    <div
        role="alert"
        data-slot="field-error"
        {{ $attributes->class(cn('text-sm font-normal text-destructive')) }}
    >
        {{ $slot }}
    </div>
@elseif (filled($errorKey) && ! $errorsIsBag && $errors === null)
    @error($errorKey)
        <div
            role="alert"
            data-slot="field-error"
            {{ $attributes->class(cn('text-sm font-normal text-destructive')) }}
        >
            {{ $message }}
        </div>
    @enderror
@elseif (count($uniqueMessages) === 1)
    <div
        role="alert"
        data-slot="field-error"
        {{ $attributes->class(cn('text-sm font-normal text-destructive')) }}
    >
        {{ $uniqueMessages[0] }}
    </div>
@elseif (count($uniqueMessages) > 1)
    <div
        role="alert"
        data-slot="field-error"
        {{ $attributes->class(cn('text-sm font-normal text-destructive')) }}
    >
        <ul class="{{ cn('ml-4 flex list-disc flex-col gap-1') }}">
            @foreach ($uniqueMessages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
