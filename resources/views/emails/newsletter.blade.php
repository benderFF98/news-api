{{--@foreach ($sources as $key => $source)--}}
{{--    <div style="text-align: center; max-width: 600px; margin: 0 auto;">--}}
{{--        <h2>{{ $key }}</h2>--}}

{{--        <table style="border-collapse: collapse; width: 100%; border-radius: 10px; overflow: hidden;">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th style="border: 1px solid #000; text-align: center;">Title</th>--}}
{{--                <!-- Add other table headers as needed -->--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($source as $article)--}}
{{--                <tr>--}}
{{--                    <td style="border: 1px solid #000; text-align: center;">{{ $article['title'] }}</td>--}}
{{--                    <!-- Add other table cells for additional article attributes -->--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--@endforeach--}}

<header>
    <script src="https://cdn.tailwindcss.com"></script>
</header>
@livewire('newsletter-email')
