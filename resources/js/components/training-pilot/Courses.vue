<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Card, CardContent } from '@/components/ui/card';
import {
    Carousel,
    CarouselContent,
    CarouselItem,
    type CarouselApi,
} from '@/components/ui/carousel';
import { Icon } from '@iconify/vue';
import { ref } from 'vue';

type BlogPost = {
    id: number;
    link: string;
    image: string;
    date: string;
    title: string;
};

interface Props {
    subheading?: string;
    heading?: string;
    ctaText?: string;
    ctaHref?: string;
    blogPosts?: BlogPost[];
}

const props = withDefaults(defineProps<Props>(), {
    subheading: 'School',
    heading: 'Available Courses',
    ctaText: 'MORE ARTICLES',
    ctaHref: '*',
    blogPosts: () => [
        {
            id: 1,
            link: '*',
            image: '/assets/blog_carusel_img_04.jpg',
            date: '100$ - 5 hours',
            title: 'Ranked Drone Course: Drone Underground',
        },
        {
            id: 2,
            link: '*',
            image: '/assets/blog_carusel_img_05.jpg',
            date: '550$ - 40 hours',
            title: 'Fly Robostics Ground School',
        },
        {
            id: 3,
            link: '*',
            image: '/assets/blog_carusel_img_02.jpg',
            date: '300$ - 20 hours',
            title: 'Drone Pilot Ground School',
        },
        {
            id: 4,
            link: '*',
            image: '/assets/blog_carusel_img_01.jpg',
            date: '300$ - 20 hours',
            title: 'Drone Pilot Ground School',
        },
    ],
});

const carouselApi = ref<CarouselApi>();

const onCarouselInit = (api: CarouselApi) => {
    carouselApi.value = api;
};
</script>

<template>
    <section
        class="font-roboto pt-24 pb-28 text-lg text-zinc-500 min-[576px]:pt-36 min-[576px]:pb-40 min-[1025px]:pt-36 min-[1025px]:pb-40"
    >
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="-mt-16 md:-mt-20">
                <div class="-m-3.5 flex flex-wrap">
                    <!-- Header Section -->
                    <div class="mt-16 w-full px-4 md:mt-20">
                        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between"> 
                            <!-- Header Content with mobile arrows beside text -->
                            <div class="lg:w-2/3 mb-8 lg:mb-0">
                                <div class="pb-6 font-bold">
                                    <div class="flex items-start justify-between lg:block gap-4">
                                        <!-- Texts stacked on the left -->
                                        <div>
                                            <div class="text-indigo-900">
                                                <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subheading }}
                                            </div>
                                          <h3 class="text-zinc-800 text-[1.6rem] sm:text-[2.5rem] md:text-[2.5rem] leading-tight mt-5">
                                             {{ heading }}
                                             </h3>

                                        </div>
                                        <!-- Mobile-only arrows beside texts -->
                                        <div class="flex lg:hidden items-center gap-3">
                                            <button
                                                @click="carouselApi?.scrollPrev()"
                                                class="bg-white cursor-pointer w-10 h-10 border-2 border-zinc-300 rounded-full hover:bg-indigo-900 hover:border-indigo-900 group flex items-center justify-center transition-all duration-300"
                                            >
                                                <Icon
                                                    icon="heroicons:chevron-left"
                                                    class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300"
                                                />
                                            </button>
                                            <button
                                                @click="carouselApi?.scrollNext()"
                                                class="bg-white cursor-pointer w-10 h-10 border-2 border-zinc-300 rounded-full hover:bg-indigo-900 hover:border-indigo-900 group flex items-center justify-center transition-all duration-300"
                                            >
                                                <Icon
                                                    icon="heroicons:chevron-right"
                                                    class="w-5 h-5 text-indigo-900 group-hover:text-white transition-colors duration-300"
                                                />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Posts Carousel -->
                    <div class="mt-8 w-full overflow-x-hidden px-16 lg:flex lg:items-center">               
                        <div class="flex-1">
                            <Carousel
                                :opts="{
                                    align: 'start',
                                    loop: false,
                                    slidesToScroll: 1,
                                }"
                                @init-api="onCarouselInit"
                                class="w-full"
                            >
                                <CarouselContent class="-ml-0 sm:-ml-3.5">
                                    <CarouselItem
                                        v-for="post in blogPosts"
                                        :key="post.id"
                                        class="pl-0 sm:pl-3.5 basis-full max-[640px]:basis-full max-[790px]:basis-1/2 min-[791px]:basis-1/3"
                                    >
                                        <Card class="group overflow-hidden border-0 bg-transparent p-0 shadow-none">     
                                            <a :href="post.link" class="block">
                                                <CardContent class="relative p-0">
                                                    <div class="relative mt-6 mb-3 inline-block w-full max-w-[20rem] overflow-hidden bg-gray-100 shadow-[0px_3px_14px_rgba(17,19,91,0.2)] transition-transform duration-300 before:absolute before:top-0 before:left-0 before:h-[14px] before:w-full before:bg-[#2e3192] before:content-[''] hover:-translate-y-1 max-[790px]:mx-auto max-[790px]:max-w-[18rem]">
                                                        
                                                        <figure
                                                            class="relative m-0 cursor-pointer overflow-hidden"
                                                        >
                                                            <img
                                                                :src="
                                                                    post.image
                                                                "
                                                                :alt="
                                                                    post.title
                                                                "
                                                                class="w-full max-w-full transition-transform duration-300 group-hover:scale-105"
                                                            />
                                                            <div
                                                                class="absolute top-0 left-0 flex h-full w-full flex-col items-end justify-end bg-[linear-gradient(to_bottom,rgba(255,255,255,0)_0%,white_90%)] p-8 font-black transition-all duration-300 group-hover:bg-gradient-to-t group-hover:from-indigo-900/90 group-hover:to-transparent"
                                                            >
                                                                <div
                                                                    class="w-full text-zinc-500 transition-colors duration-300 group-hover:text-white"
                                                                >
                                                                    {{
                                                                        post.date
                                                                    }}
                                                                </div>
                                                                <h4
                                                                    class="mt-3 mb-2 w-full text-[1.625rem] leading-8 text-zinc-800 transition-colors duration-300 group-hover:text-white"
                                                                >
                                                                    {{
                                                                        post.title
                                                                    }}
                                                                </h4>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </CardContent>
                                            </a>
                                        </Card>
                                    </CarouselItem>
                                </CarouselContent>
                            </Carousel>
                        </div>
                        <!-- Arrows aligned to the right of the cards -->
                        <div class="hidden flex-col justify-center space-y-4 lg:flex lg:pl-8">
                            
                            <button
                                @click="carouselApi?.scrollPrev()"
                                class="group flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-zinc-300 bg-white transition-all duration-300 hover:border-indigo-900 hover:bg-indigo-900"
                            >
                                <Icon
                                    icon="heroicons:chevron-left"
                                    class="h-5 w-5 text-indigo-900 transition-colors duration-300 group-hover:text-white"
                                />
                            </button>
                            <button
                                @click="carouselApi?.scrollNext()"
                                class="group flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-zinc-300 bg-white transition-all duration-300 hover:border-indigo-900 hover:bg-indigo-900"
                            >
                                <Icon
                                    icon="heroicons:chevron-right"
                                    class="h-5 w-5 text-indigo-900 transition-colors duration-300 group-hover:text-white"
                                />
                            </button>
                        </div>
                    </div>

                
                </div>
            </div>
        </div>
    </section>
</template>

