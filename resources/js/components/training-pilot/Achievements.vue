<script setup lang="ts">
import { Icon } from '@iconify/vue';

interface Props {
    videoThumbnail?: string;
    videoLink?: string;
    subtitle?: string;
    title?: string;
    description1?: string;
    description2?: string;
}

const props = withDefaults(defineProps<Props>(), {
    videoThumbnail:
        'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/img_05.jpg',
    videoLink: 'https://www.dailymotion.com/video/xxgmlg#.UV71MasY3wE',
    subtitle: 'Achievements',
    title: 'Quadron Progress',
    description1:
        'Rainbowfish jawfish frigate mackerel Atlantic eel cuskfish Pacific saury porbeagle shark longfin horn shark, longnose dace long-finned char rough pomfret smelt tarwhine.',
    description2:
        'Pearleye thorny catfish deep sea bonefish; sucker, electric knifefish. Flounder Oriental loach sergeant major jellynose fish surf sardine Siamese fighting fish porcupinefish barracuda Steve fish trevally rohu. Black scalyfin oarfish',
});
</script>

<template>
    <section class="font-roboto pt-32 text-lg text-zinc-500 min-[576px]:pt-48">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="-mt-16 md:-mt-20">
                <div class="-m-3.5 flex flex-wrap">
                    <!-- Main Content Row - Image and Text Side by Side -->
                    <div class="mt-16 w-full px-4 md:mt-20">
                        <div
                            class="flex flex-col lg:flex-row lg:items-start lg:justify-between"
                        >
                            <!-- Left Side - Video Thumbnail with Play Button -->
                            <div class="mb-8 lg:mb-0 lg:w-1/2">
                                <div
                                    class="flex w-full flex-col text-indigo-900"
                                >
                                    <a
                                        :href="videoLink"
                                        class="group relative inline-block"
                                    >
                                        <img
                                            :src="videoThumbnail"
                                            class="h-auto w-full max-w-full cursor-pointer"
                                            alt="Video thumbnail"
                                        />
                                        <!-- Play Button -->
                                        <div
                                            class="absolute inset-0 flex items-center justify-center"
                                        >
                                            <div
                                                class="flex h-22 w-22 transform items-center justify-center rounded-full border-2 border-transparent bg-white transition-all duration-300 group-hover:scale-110 group-hover:border-white group-hover:bg-transparent"
                                            >
                                                <Icon
                                                    icon="heroicons:play"
                                                    class="ml-1 h-6 w-6 text-indigo-900 transition-colors duration-300 group-hover:text-white"
                                                />
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Right Side - Text Content -->
                            <div class="lg:w-1/2 lg:pl-12">
                                <div class="flex flex-col">
                                    <!-- Header Section -->
                                    <div class="pb-6 font-bold">
                                        <div class="text-indigo-900">
                                            <i
                                                class="mr-6 inline-block h-0.5 w-8 bg-indigo-900"
                                            ></i>
                                            {{ subtitle }}
                                        </div>
                                        <h4
                                            class="mt-5 text-[1.6rem] leading-tight text-zinc-800 sm:text-[3rem] md:text-[3.75rem]"
                                        >
                                            {{ title }}
                                        </h4>
                                    </div>

                                    <!-- Description -->
                                    <div class="space-y-3">
                                        <p>{{ description1 }}</p>
                                        <p>{{ description2 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

