<script setup lang="ts">
interface Props {
  subheading?: string
  heading?: string
  formAction?: string
}

const props = withDefaults(defineProps<Props>(), {
  subheading: 'Contacts',
  heading: 'Get in Touch',
  formAction: 'https://quadrone.ninetheme.com/#wpcf7-f268-p105-o1',
})
</script>

<template>
  <section class="bg-gray-100 text-zinc-500 text-lg">
    <!-- Section Wrapper -->
    <div class="relative w-full">
      <!-- Content Container -->
      <div
        class="container mx-auto px-5 min-[791px]:pl-0 min-[791px]:pr-6 min-[1230px]:pl-0 min-[1230px]:pr-8 relative z-10 pt-12 min-[576px]:pt-16 pb-12 min-[576px]:pb-16"
      >
        <!-- Mobile-only vertical Gray line -->
        <div
          class="absolute top-0 bottom-0 left-4 sm:left-6 lg:left-8 w-[1px] bg-gray-300 sm:hidden"
        ></div>
        <div
          class="absolute inset-0 bg-[url('https://quadrone.ninetheme.com/wp-content/plugins/quadron-elementor-addons/assets/front/img/sectionbg_vertical_line.png')] bg-repeat-y bg-left-top -z-10 pointer-events-none"
        ></div>

        <!-- Header Section -->
        <div class="pb-11 min-[791px]:pb-6 font-bold">
          <div class="text-indigo-900">
            <i class="bg-indigo-900 inline-block w-8 h-0.5 mr-6"></i>{{ subheading }}
          </div>
          <h4 class="text-zinc-800 font-bold text-[2.5rem] leading-none mt-5 min-[791px]:mt-5">
            {{ heading }}
          </h4>
        </div>

        <!-- Form Section -->
        <div>
          <form :action="formAction">
            <div>
              <div class="flex flex-wrap -m-3.5">
                <!-- Left Column - Form Fields -->
                <div
                  class="basis-full px-4 relative w-full min-[791px]:basis-[41.6667%] min-[1025px]:basis-1/3"
                >
                  <!-- First Name -->
                  <div class="relative mt-5 mb-4 min-[791px]:mt-0">
                    <p class="mt-3">
                      <label
                        class="font-medium left-0 pl-7 absolute top-[1.5rem] z-[2] inline-block w-full max-w-full mb-2"
                        >First name *</label
                      >
                      <span class="text-black">
                        <input
                          type="text"
                          class="bg-white cursor-text py-1 pl-6 pr-3 w-full h-16 border-2 border-neutral-300 border-solid rounded overflow-visible"
                        />
                      </span>
                    </p>
                  </div>

                  <!-- Last Name -->
                  <div class="relative mt-5 mb-4">
                    <p class="mt-3">
                      <label
                        class="font-medium left-0 pl-7 absolute top-[1.5rem] z-[2] inline-block w-full max-w-full mb-2"
                        >Last name *</label
                      >
                      <span class="text-black">
                        <input
                          type="text"
                          class="bg-white cursor-text py-1 pl-6 pr-3 w-full h-16 border-2 border-neutral-300 border-solid rounded overflow-visible"
                        />
                      </span>
                    </p>
                  </div>

                  <!-- Email -->
                  <div class="relative mt-5 mb-4">
                    <p class="mt-3">
                      <label
                        class="font-medium left-0 pl-7 absolute top-[1.5rem] z-[2] inline-block w-full max-w-full mb-2"
                        >Email</label
                      >
                      <span class="text-black">
                        <input
                          type="email"
                          class="bg-white cursor-text py-1 pl-6 pr-3 w-full h-16 border-2 border-neutral-300 border-solid rounded overflow-visible"
                        />
                      </span>
                    </p>
                  </div>

                  <!-- Industry Dropdown -->
                  <div class="relative mt-5 mb-4">
                    <div class="relative min-h-[4.06rem]">
                      <p class="mt-3">
                        <label
                          class="text-xs font-medium left-0 pl-7 absolute top-[1rem] z-[2] inline-block w-full max-w-full mb-2"
                          >Industry *</label
                        >
                        <span>
                          <div
                            class="bg-white cursor-pointer float-left pb-3 pl-6 pt-8 w-full h-16 border-2 border-zinc-300 border-solid rounded"
                          >
                            <span>Please select</span>
                          </div>
                        </span>
                      </p>
                    </div>
                  </div>

                  <!-- Required Fields Note (hidden on mobile) -->
                  <div class="italic hidden min-[791px]:block min-[791px]:mt-10">
                    <p class="italic mt-3">* – fields are required</p>
                  </div>
                </div>

                <!-- Right Column - Message and Submit -->
                <div
                  class="basis-full px-4 relative w-full min-[791px]:basis-[58.3333%] min-[1025px]:basis-[66.6667%]"
                >
                  <!-- Message Textarea -->
                  <div class="relative mb-4">
                    <p class="mt-3">
                      <label
                        class="font-medium left-0 pl-7 absolute top-[1.5rem] z-[2] inline-block w-full max-w-full mb-2"
                        >Message</label
                      >
                      <span class="text-black">
                        <textarea
                          class="bg-white cursor-text pb-1 pl-6 pr-3 pt-6 resize-y w-full h-80 border-2 border-neutral-300 border-solid rounded overflow-auto"
                        ></textarea>
                      </span>
                    </p>
                  </div>

                  <!-- Submit Button -->
                  <p class="mt-3 text-white font-bold">
                    <input
                      type="submit"
                      value="SEND MESSAGE"
                      class="bg-indigo-900 items-center cursor-pointer justify-center py-1 px-9 pt-1.5 text-center inline-flex w-52 h-16 border-2 border-indigo-900 border-solid rounded-4xl overflow-visible"
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

<style scoped>
</style>

