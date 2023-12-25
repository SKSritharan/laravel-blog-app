<div
    wire:ignore
    x-data x-init="
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.setOptions({
        allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                @this.upload('{{$attributes['wire:model']}}', file, load, error, progress)
            },
            revert: (filename, load) => {
                @this.removeUpload('{{$attributes['wire:model']}}', filename, load)
            },
        },
    });
    FilePond.create($refs.filepond);
    "
>
    <label class="mt-2 text-sm text-secondary-500 dark:text-secondary-400">
        {{ $attributes['label']}}
    </label>
    <input type="file" class="filepond" name="{{ $attributes['name']}}" x-ref="filepond" data-allow-reorder="true">
</div>
