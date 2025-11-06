<script setup lang="ts">
import { 
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext
} from '@/components/ui/carousel'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'

// Define interfaces
interface Product {
  id: number
  name: string
  image: string
  link: string
  price: string
}

interface Props {
  sectionTitle?: string
  products?: Product[]
}

// Default props
const props = withDefaults(defineProps<Props>(), {
  sectionTitle: 'Related Products',
  products: () => [
    {
      id: 1,
      name: 'Mavic 2 Zoom',
      image: '/assets/product_img-02.jpg',
      link: '*',
      price: '$550'
    },
    {
      id: 2,
      name: 'Mavic Pro Silver',
      image: '/assets/product_img-04.jpg',
      link: '*',
      price: '$450'
    },
    {
      id: 3,
      name: 'Mavic 2 Pro',
      image: '/assets/product_img-01.jpg',
      link: '*',
      price: '$550'
    },
    {
      id: 4,
      name: 'Mavic Pro Platinum',
      image: '/assets/product_img-04.jpg',
      link: '*',
      price: '$550'
    },
    {
      id: 5,
      name: 'Mavic 2 t Kit',
      image: '/assets/product_img-05-1.jpg',
      link: '*',
      price: '$890'
    },


  ]
})

// Methods
const addToCart = (product: Product) => {
  // Add to cart logic here
  console.log(`Added ${product.name} to cart`)
}
</script>




<template>
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36" style="background-image: url('/assets/sectionbg_wrapper-03.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      
      <!-- Section Header -->
      <div class="pb-16 text-[2.50rem] leading-none text-zinc-800 font-bold min-[791px]:pb-6">
        <h4 class="min-[791px]:mt-5">{{ sectionTitle }}</h4>
      </div>

      <!-- Carousel -->
      <Carousel class="min-[576px]:-ml-3.5">
        <CarouselContent>
          <CarouselItem 
            v-for="product in products" 
            :key="product.id"
            class="md:basis-1/2 lg:basis-1/3 xl:basis-1/4"
          >
            <div class="p-3.5">
              <Card class="bg-white pb-10 relative group hover:shadow-lg transition-all duration-300">
                <CardContent class="p-0">
                  
                  <!-- Product Image -->
                  <div class="overflow-hidden">
                    <a :href="product.link" class="block">
                      <img 
                        :src="product.image" 
                        :alt="product.name"
                        class="w-full h-auto max-w-full cursor-pointer group-hover:scale-105 transition-transform duration-300"
                      />
                    </a>
                  </div>
                  
                  <!-- Product Info -->
                  <div class="px-7 pt-7 text-center">
                    <div class="text-lg">
                      From <span class="text-indigo-900 font-semibold">{{ product.price }}</span>
                    </div>
                    <h3 class="text-zinc-800 text-[1.63rem] leading-8 mt-1 font-semibold">
                      {{ product.name }}
                    </h3>
                  </div>

                  <!-- Add to Cart Button -->
                  <div class="text-center w-full mt-5">
                    <Button 
                      variant="outline"
                      class="text-indigo-900 font-bold uppercase h-16 px-9 mt-3 border-2 border-indigo-900/50 hover:bg-indigo-900 hover:text-white transition-all duration-200 rounded-3xl"
                      @click="addToCart(product)"
                    >
                      Add to cart
                    </Button>
                  </div>
                </CardContent>
              </Card>
            </div>
          </CarouselItem>
        </CarouselContent>
        
        <!-- Navigation Buttons -->
        <CarouselPrevious 
          class="left-0 min-[1600px]:left-[-9.38rem] min-[1340px]:left-[-4%] min-[1470px]:left-[-7%] bg-white text-black border-2 border-neutral-300 hover:bg-neutral-50 w-12 h-12"
        />
        <CarouselNext 
          class="right-0 min-[1600px]:right-[-9.38rem] min-[1340px]:right-[-4%] min-[1470px]:right-[-7%] bg-white text-black border-2 border-neutral-300 hover:bg-neutral-50 w-12 h-12"
        />
      </Carousel>
    </div>
  </section>
</template>