<x-Card class="mb-4">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>
        <div class="text-slate-500">
            ${{ number_format($job->salary) }}
        </div>
    </div>
    <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
        <div class="flex space-x-4">
            <div>Company Name</div>
            <div>{{ $job->location }}</div>
        </div>
        <div class="flex space-x-4 text-xs">
            <x-Tag>{{ Str::ucfirst($job->experience) }}</x-Tag>
            <x-Tag>{{  Str::ucfirst($job->category) }}</x-Tag>
        </div>
    </div>

    <p class="text-sm text-slate-500 mb-4">{!! nl2br(e($job->description)) !!}</p>
    
    {{ $slot }}
 </x-Card>