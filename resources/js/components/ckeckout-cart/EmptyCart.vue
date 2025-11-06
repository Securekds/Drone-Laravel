<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Card, CardContent } from '@/components/ui/card'
import { ShoppingCart } from 'lucide-vue-next'

// Define props interface
interface Props {
  title?: string
  message?: string
  buttonText?: string
  shopLink?: string
}

// Default props
const props = withDefaults(defineProps<Props>(), {
  title: 'Cart',
  message: 'Your cart is currently empty.',
  buttonText: 'Return to shop',
  shopLink: '/shop'
})
</script>

<template>
  <section class="text-zinc-500 text-lg py-24 bg-gray-100 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36">
    <div class="w-full mx-auto 
                px-3.5
                min-[576px]:max-w-[34.13rem] 
                md:max-w-[45.00rem] 
                min-[791px]:max-w-[48.13rem] 
                min-[992px]:max-w-[60.00rem] 
                min-[1025px]:max-w-[61.88rem] 
                min-[1200px]:max-w-[71.25rem] 
                min-[1230px]:max-w-[75.00rem]
                max-[1229.98px]:max-w-inherit max-[1229.98px]:w-full max-[1229.98px]:px-[25px]
                max-[790.98px]:px-[19px]">
      
      <div class="flex flex-wrap -m-3.5">
        <div class="w-full px-4 text-center">
          
          <!-- Section Header -->
          <div class="pb-16 text-[2.50rem] leading-none text-zinc-800 font-bold min-[791px]:pb-6">
            <h1 class="min-[791px]:mt-5">{{ title }}</h1>
          </div>

          <!-- Empty Cart Card -->
          <Card class="max-w-md mx-auto">
            <CardContent class="pt-20 pb-8 px-8">
              
              <!-- Icon -->
              <div class="mb-6">
                <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                  <ShoppingCart class="w-10 h-10 text-indigo-900" />
                </div>
              </div>

              <!-- Message -->
              <p class="text-neutral-600 text-lg font-medium mb-8">
                {{ message }}
              </p>

              <!-- Return to Shop Button -->
              <Button 
                as-child
                class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold h-16 px-9 rounded-3xl w-full"
              >
                <a :href="shopLink">
                  {{ buttonText }}
                </a>
              </Button>

              <!-- Additional suggestion -->
              <p class="text-zinc-500 text-sm mt-6">
                Browse our collection to find amazing products!
              </p>
            </CardContent>
          </Card>
        </div>
      </div>
    </div>
  </section>
</template>
