@props(['options', 'selected' => null, 'class' => '', 'disabled' => false])

<label>
    <select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm ' . $class]) }}>
        <option value="">{{ __('Select a Category') }}</option>
        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</label>
