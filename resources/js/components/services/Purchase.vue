<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Icon } from '@iconify/vue';

interface FeatureItem {
    id: number;
    number: string;
    title: string;
    description: string;
    imageUrl: string;
    imageSrcSet?: string;
    discoverLink?: string;
}

interface Props {
    sectionDescription?: string;
    featureItems?: FeatureItem[];
}

const props = withDefaults(defineProps<Props>(), {
    sectionDescription:
        'Footballfish bottlenose steelhead eel sawtooth eel South American Lungfish marine hatchetfish. Sabertooth Ganges shark whalefish clown triggerfish, Rabbitfish hairtail tarwhine vendace.',
    featureItems: () => [
        {
            id: 1,
            number: '01',
            title: 'Care Refresh –<br class="min-[791px]:block" />Protect Your Purchase',
            description:
                'Garden eel labyrinth fish; round stingray. Fathead sculpin hawkfish mudskipper bonytail chub ruffe barbeled dragonfish yellowbelly tail catfish, spotted danio.',
            imageUrl:
                'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/chessbox_img_01.jpg',
            imageSrcSet:
                'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/chessbox_img_01.jpg 473w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/chessbox_img_01-300x279.jpg 300w',
            discoverLink: 'https://quadrone.ninetheme.com/about-us',
        },
        {
            id: 2,
            number: '02',
            title: 'When the quadcopter <br class="min-[791px]:block" />is first switched on',
            description:
                'Garden eel labyrinth fish; round stingray. Fathead sculpin hawkfish mudskipper bonytail chub ruffe barbeled dragonfish yellowbelly tail catfish, spotted danio',
            imageUrl:
                'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/chessbox_img_02.jpg',
            imageSrcSet:
                'https://quadrone.ninetheme.com/wp-content/uploads/2019/11/chessbox_img_02.jpg 470w, https://quadrone.ninetheme.com/wp-content/uploads/2019/11/chessbox_img_02-300x281.jpg 300w',
            discoverLink: 'https://quadrone.ninetheme.com/about-us',
        },
    ],
});
</script>

<template>
    <section class="font-roboto py-24 text-lg text-zinc-500 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="-mt-16 md:-mt-20">
                <div class="-m-3.5 flex flex-wrap">
                    <!-- Section Description -->
                    <div class="mt-16 w-full px-4 md:mt-20">
                        <div
                            class="mx-auto max-w-4xl text-center text-[1.63rem] leading-8 text-indigo-900"
                        >
                            {{ sectionDescription }}
                        </div>
                    </div>

                    <!-- Feature Items Container -->
                    <div class="w-full">
                        <!-- First Feature Item -->
                        <div
                            class="mt-16 min-[791px]:mt-24 min-[791px]:flex min-[791px]:flex-row min-[791px]:items-center min-[791px]:justify-start"
                        >
                            <!-- Image -->
                            <div
                                class="min-[791px]:order-2 min-[791px]:min-w-[39.5%]"
                            >
                                <img
                                    :src="featureItems[0].imageUrl"
                                    :srcset="featureItems[0].imageSrcSet"
                                    class="h-auto w-full max-w-full"
                                    :alt="featureItems[0].title"
                                />
                            </div>

                            <!-- Content -->
                            <div
                                class="mt-10 px-6 min-[791px]:order-1 min-[791px]:pr-12 min-[791px]:pl-0 min-[1025px]:pr-20 min-[1230px]:pr-32 sm:px-8"
                            >
                                <div class="pb-6 font-bold">
                                    <div class="text-indigo-900">
                                        <i
                                            class="mr-6 inline-block h-0.5 w-8 bg-indigo-900"
                                        ></i>
                                        {{ featureItems[0].number }}
                                    </div>
                                    <h4
                                        class="mt-5 text-[2.50rem] leading-none text-zinc-800"
                                        v-html="featureItems[0].title"
                                    ></h4>
                                </div>

                                <p class="leading-relaxed">
                                    {{ featureItems[0].description }}
                                </p>

                                <!-- DISCOVER Button -->
                                <Button
                                    as-child
                                    variant="ghost"
                                    class="group mt-9 inline-flex items-center justify-start p-0 font-bold text-indigo-900 hover:bg-transparent sm:mt-12"
                                >
                                    <a
                                        :href="
                                            featureItems[0].discoverLink || '#'
                                        "
                                        class="flex items-center no-underline"
                                    >
                                        <span
                                            class="mr-3.5 flex h-12 min-h-[3.13rem] w-12 min-w-[3.13rem] items-center justify-center rounded-full border-2 border-zinc-300 transition-all duration-200 group-hover:border-indigo-900 group-hover:bg-indigo-900"
                                        >
                                            <Icon
                                                icon="heroicons:arrow-right"
                                                class="h-3 w-3 text-black transition-colors duration-200 group-hover:text-white"
                                            />
                                        </span>
                                        <span class="cursor-pointer"
                                            >DISCOVER</span
                                        >
                                    </a>
                                </Button>
                            </div>
                        </div>

                        <!-- Second Feature Item -->
                        <div
                            class="mt-16 min-[791px]:mt-24 min-[791px]:flex min-[791px]:flex-row min-[791px]:items-center min-[791px]:justify-start"
                        >
                            <!-- Image -->
                            <div class="min-[791px]:min-w-[39.5%]">
                                <img
                                    :src="featureItems[1].imageUrl"
                                    :srcset="featureItems[1].imageSrcSet"
                                    class="h-auto w-full max-w-full"
                                    :alt="featureItems[1].title"
                                />
                            </div>

                            <!-- Content -->
                            <div
                                class="mt-10 pr-4 pl-8 min-[791px]:pr-0 min-[791px]:pl-12 min-[1025px]:pl-20 min-[1230px]:pl-32 sm:pl-10"
                            >
                                <div class="pb-6 font-bold">
                                    <div class="text-indigo-900">
                                        <i
                                            class="mr-6 inline-block h-0.5 w-8 bg-indigo-900"
                                        ></i>
                                        {{ featureItems[1].number }}
                                    </div>
                                    <h4
                                        class="mt-5 text-[2.50rem] leading-none text-zinc-800"
                                        v-html="featureItems[1].title"
                                    ></h4>
                                </div>

                                <p class="leading-relaxed">
                                    {{ featureItems[1].description }}
                                </p>

                                <!-- DISCOVER Button -->
                                <Button
                                    as-child
                                    variant="ghost"
                                    class="group mt-9 inline-flex items-center justify-start p-0 font-bold text-indigo-900 hover:bg-transparent sm:mt-12"
                                >
                                    <a
                                        :href="
                                            featureItems[1].discoverLink || '#'
                                        "
                                        class="flex items-center no-underline"
                                    >
                                        <span
                                            class="mr-3.5 flex h-12 min-h-[3.13rem] w-12 min-w-[3.13rem] items-center justify-center rounded-full border-2 border-zinc-300 transition-all duration-200 group-hover:border-indigo-900 group-hover:bg-indigo-900"
                                        >
                                            <Icon
                                                icon="heroicons:arrow-right"
                                                class="h-3 w-3 text-black transition-colors duration-200 group-hover:text-white"
                                            />
                                        </span>
                                        <span class="cursor-pointer"
                                            >DISCOVER</span
                                        >
                                    </a>
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800&display=swap');
.font-roboto {
    font-family: 'Roboto', sans-serif;
}
</style>
