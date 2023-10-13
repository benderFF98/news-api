<div>
    @foreach($sources as $key => $source)
        <div>
            <section class="mt-10">
                <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                    <!-- Start coding here -->
                    <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex items-center justify-between d p-4">
                            <div class="flex">
                                <div class="relative w-full">
                                    <h1>{{ $key }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Title</th>
                                    {{--                                <th scope="col" class="px-4 py-3">Source</th>--}}
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($source as $article)
                                    <tr class="border-b ">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{$article->title}}</th>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <a href={{$article->url}} target="_blank">
                                                <button class="px-3 py-1 bg-blue-500 text-white rounded">Go to article</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    @endforeach
</div>
