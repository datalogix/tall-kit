<x-table :cols="['id' => 'ID', 'name' => 'Name']">
    <x-slot name="empty">
        <x-row>
            <x-cell colspan="2">
                No data
            </x-cell>
        </x-row>
    </x-slot>
</x-table>
