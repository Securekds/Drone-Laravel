<script setup lang="ts">
import Testcomp from '@/components/home03/Testcomp.vue';
</script>

<template>
  <div class="relative w-full flex min-h-screen">
    <!-- Red vertical line (offset from left) -->
    <div class="fixed top-0 left-8 w-[2px] h-screen bg-red-500"></div>

    <!-- Content directly next to the line -->
    <div class="flex-1 ml-[calc(2rem+2px)]">
      <Testcomp />
    </div>
  </div>
</template>
