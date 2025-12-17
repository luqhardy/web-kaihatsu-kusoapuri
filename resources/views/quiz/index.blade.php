<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            クイズ画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white text-xl m-10">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-white">
                    問①
                    <br>
                    <br>
                    <div class="text-sm text-white">
                        質問のプレースホルダー文章
                    </div>

                </div>

            </div>
            <div>
                <button class="mt-4" onclick="location.href='/logout'"
                    class="font-black text-base text-white bg-black border-none px-6 py-3 rounded hover:opacity-80 transition-opacity cursor-pointer">
                    ←
                </button><button class="mt-4" onclick="location.href='/logout'"
                    class="font-black text-base text-white bg-black border-none px-6 py-3 rounded hover:opacity-80 transition-opacity cursor-pointer">
                    →
                </button>
            </div>
        </div>
    </div>
</x-app-layout>