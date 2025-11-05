<script setup lang="ts">
interface Props {
    subheading?: string;
    heading?: string;
    formAction?: string;
}

const props = withDefaults(defineProps<Props>(), {
    subheading: 'Contacts',
    heading: 'Get in Touch',
    formAction: '*',
});
</script>

<template>
    <section class="bg-gray-100 text-lg text-zinc-500">
        <!-- Section Wrapper -->
        <div class="relative w-full">
            <!-- Content Container -->
            <div
                class="relative z-10 container mx-auto pt-12 pr-5 pb-12 pl-8 min-[576px]:pt-16 min-[576px]:pb-16 min-[791px]:pr-6 min-[791px]:pl-0 min-[1230px]:pr-8 min-[1230px]:pl-0 sm:pl-10"
            >
                <!-- Header Section -->
                <div class="pb-11 font-bold min-[791px]:pb-6">
                    <div class="text-indigo-900">
                        <i class="mr-6 inline-block h-0.5 w-8 bg-indigo-900"></i
                        >{{ subheading }}
                    </div>
                    <h4
                        class="mt-5 text-[2.5rem] leading-none font-bold text-zinc-800 min-[791px]:mt-5"
                    >
                        {{ heading }}
                    </h4>
                </div>

                <!-- Form Section -->
                <div>
                    <form :action="formAction">
                        <div>
                            <div class="-m-3.5 flex flex-wrap">
                                <!-- Left Column - Form Fields -->
                                <div
                                    class="relative w-full basis-full px-4 min-[791px]:basis-[41.6667%] min-[1025px]:basis-1/3"
                                >
                                    <!-- First Name -->
                                    <div
                                        class="relative mt-5 mb-4 min-[791px]:mt-0"
                                    >
                                        <p class="mt-3">
                                            <label
                                                class="absolute top-[1.5rem] left-0 z-[2] mb-2 inline-block w-full max-w-full pl-7 font-medium"
                                                >First name *</label
                                            >
                                            <span class="text-black">
                                                <input
                                                    type="text"
                                                    class="h-16 w-full cursor-text overflow-visible rounded border-2 border-solid border-neutral-300 bg-white py-1 pr-3 pl-6"
                                                />
                                            </span>
                                        </p>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="relative mt-5 mb-4">
                                        <p class="mt-3">
                                            <label
                                                class="absolute top-[1.5rem] left-0 z-[2] mb-2 inline-block w-full max-w-full pl-7 font-medium"
                                                >Last name *</label
                                            >
                                            <span class="text-black">
                                                <input
                                                    type="text"
                                                    class="h-16 w-full cursor-text overflow-visible rounded border-2 border-solid border-neutral-300 bg-white py-1 pr-3 pl-6"
                                                />
                                            </span>
                                        </p>
                                    </div>

                                    <!-- Email -->
                                    <div class="relative mt-5 mb-4">
                                        <p class="mt-3">
                                            <label
                                                class="absolute top-[1.5rem] left-0 z-[2] mb-2 inline-block w-full max-w-full pl-7 font-medium"
                                                >Email</label
                                            >
                                            <span class="text-black">
                                                <input
                                                    type="email"
                                                    class="h-16 w-full cursor-text overflow-visible rounded border-2 border-solid border-neutral-300 bg-white py-1 pr-3 pl-6"
                                                />
                                            </span>
                                        </p>
                                    </div>

                                    <!-- Industry Dropdown -->
                                    <div class="relative mt-5 mb-4">
                                        <div class="relative min-h-[4.06rem]">
                                            <p class="mt-3">
                                                <label
                                                    class="absolute top-[1rem] left-0 z-[2] mb-2 inline-block w-full max-w-full pl-7 text-xs font-medium"
                                                    >Industry *</label
                                                >
                                                <span>
                                                    <div
                                                        class="float-left h-16 w-full cursor-pointer rounded border-2 border-solid border-zinc-300 bg-white pt-8 pb-3 pl-6"
                                                    >
                                                        <span
                                                            >Please select</span
                                                        >
                                                    </div>
                                                </span>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Required Fields Note (hidden on mobile) -->
                                    <div
                                        class="hidden italic min-[791px]:mt-10 min-[791px]:block"
                                    >
                                        <p class="mt-3 italic">
                                            * – fields are required
                                        </p>
                                    </div>
                                </div>

                                <!-- Right Column - Message and Submit -->
                                <div
                                    class="relative w-full basis-full px-4 min-[791px]:basis-[58.3333%] min-[1025px]:basis-[66.6667%]"
                                >
                                    <!-- Message Textarea -->
                                    <div class="relative mb-4">
                                        <p class="mt-3">
                                            <label
                                                class="absolute top-[1.5rem] left-0 z-[2] mb-2 inline-block w-full max-w-full pl-7 font-medium"
                                                >Message</label
                                            >
                                            <span class="text-black">
                                                <textarea
                                                    class="h-80 w-full cursor-text resize-y overflow-auto rounded border-2 border-solid border-neutral-300 bg-white pt-6 pr-3 pb-1 pl-6"
                                                ></textarea>
                                            </span>
                                        </p>
                                    </div>

                                    <!-- Submit Button -->
                                    <p class="mt-3 font-bold text-white">
                                        <input
                                            type="submit"
                                            value="SEND MESSAGE"
                                            class="inline-flex h-16 w-52 cursor-pointer items-center justify-center overflow-visible rounded-4xl border-2 border-solid border-indigo-900 bg-indigo-900 px-9 py-1 pt-1.5 text-center"
                                        />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped></style>
