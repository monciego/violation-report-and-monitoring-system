<x-app-layout>
    @include('components.welcome-banner')
    <div class="grid grid-cols-12 gap-6">
        <x-stat-cards title="Today's Violations" count="0" />
        <x-stat-cards title="Total Violations" count="0" />
        <x-stat-cards title="Monthly Violations" count="0" />
    </div>
</x-app-layout>
