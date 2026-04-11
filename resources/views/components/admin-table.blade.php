@props([
    'headers' => [],
])

<div class="table-responsive diab-card">
    <table class="table table-hover align-middle mb-0 custom-table">
        <thead class="text-muted extra-small fw-bold text-uppercase" style="background: rgba(0,0,0,0.02);">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="py-3 px-4 border-bottom-0">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="border-top-0">
            {{ $slot }}
        </tbody>
    </table>
</div>

