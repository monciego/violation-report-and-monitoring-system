<x-app-layout>
    <x-welcome-banner description="Here are the latest updates from your monitoring." />
    <div class="grid grid-cols-12 gap-6">
        <x-stat-cards title="Today's Violations" :count="$numberOfTodaysViolation" />
        <x-stat-cards title="Total Violations" :count="$totalViolations" />
    </div>
</x-app-layout>