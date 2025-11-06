<script setup lang="ts">
interface Props {
  backgroundImage?: string
  subtitle?: string
  title?: string
}

const props = withDefaults(defineProps<Props>(), {
  backgroundImage:
    "url('https://quadrone.ninetheme.com/wp-content/uploads/2019/11/subpage-title-img05.jpg')",
  subtitle: 'Quadron',
  title: 'About Quadron',
})
</script>

<template>
  <!-- About Hero Section Only -->
  <section
    class="w-full relative text-zinc-500 font-bold font-roboto"
  >
    <div
      class="w-full relative flex items-end overflow-hidden bg-cover bg-center bg-no-repeat h-[300px] sm:h-[350px] md:h-[400px] lg:h-[500px]"
      :style="{ backgroundImage }"
    >
      <!-- Content -->
      <div class="w-full relative h-32 sm:h-40 md:h-48 lg:h-64 pl-4 sm:pl-6 md:pl-12 lg:pl-20 pt-4 sm:pt-6 md:pt-12">
        <!-- Decorative box and lines (absolute) -->
        <div class="absolute top-0 left-10 bg-[#2e3192] z-[1] w-[150px] h-[148px] sm:w-[200px] sm:h-[198px] md:w-[300px] md:h-[298px] lg:w-[271px] lg:h-[270px] xl:h-[318px]"></div>
        <div class="absolute top-0 left-10 z-[2] w-[150px] h-[148px] sm:w-[200px] sm:h-[198px] md:w-[300px] md:h-[298px] lg:w-[271px] lg:h-[270px] xl:h-[318px]">
          <div class="absolute bottom-[70px] left-[40px] w-[38px] h-[2px] bg-white"></div>
          <div class="absolute bottom-[70px] left-[90px] w-[68px] h-[2px] bg-[#7A7A7A]"></div>
        </div>

        <!-- Text -->
        <div class="relative z-[3] text-white">
          <div class="text-xl">{{ subtitle }}</div>
          <h1 class="text-[2.5rem] sm:text-[3rem] md:text-[3.75rem] leading-tight pb-3 sm:pb-6 mt-4 mb-2">
            {{ title }}
          </h1>
        </div>
      </div>
    </div>
  </section>
</template>



