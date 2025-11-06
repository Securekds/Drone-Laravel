<script setup lang="ts">
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Badge } from '@/components/ui/badge'
import { Card, CardContent } from '@/components/ui/card'
import { 
  ShoppingCart, 
  Search, 
  Plus, 
  Minus 
} from 'lucide-vue-next'
import { Icon } from '@iconify/vue'

// Define interfaces
interface ProductImage {
  large: string
  thumbnail: string
}

interface ProductFeature {
  name: string
  value: string
  icon: string
}

interface ProductData {
  id: number
  name: string
  price: string
  originalPrice?: string
  salePrice?: string
  isOnSale: boolean
  description: string
  stock: number
  rating: number
  reviewCount: number
  images: ProductImage[]
  features: ProductFeature[]
  categories: string[]
  tags: string[]
}

interface Props {
  productData: ProductData
}

// Define props with default values
const props = withDefaults(defineProps<Props>(), {
  productData: () => ({
    id: 1,
    name: 'DJI Smart Controller',
    price: '249',
    originalPrice: '349',
    salePrice: '249',
    isOnSale: true,
    description: 'Skipping goby freshwater shark, brook trout Black swallower, "treefish swallower," tripod fish elasmobranch, bonefish.',
    stock: 2,
    rating: 4.33,
    reviewCount: 3,
    images: [
      {
        large: '/assets/product_img-06.jpg',
        thumbnail: '/assets/product_img-06-100x100.jpg'
      },
      {
        large: '/assets/product_img-04.jpg',
        thumbnail: '/assets/product_img-04-100x100.jpg'
      },
      {
        large: '/assets/product_img-05.jpg',
        thumbnail: '/assets/product_img-05-100x100.jpg'
      },
      {
        large: '/assets/product_img-03.jpg',
        thumbnail: '/assets/product_img-03-100x100.jpg'
      },
      {
        large: '/assets/product_img-07-07.jpg',
        thumbnail: '/assets/product_img-07-07-100x100.jpg'
      },
      {
        large: '/assets/product_img-011.jpg',
        thumbnail: '/assets/product_img-01-100x100.jpg'
      }
    ],
    features: [
      {
        name: 'Flight time',
        value: '16 min',
        icon: '/assets/feat01.svg'
      },
      {
        name: 'Transmission Distance',
        value: '1.2 ml (2 km)',
        icon: '/assets/feat02.svg'
      },
      {
        name: 'Effective Pixels',
        value: '12 mp',
        icon: '/assets/feat03.svg'
      },
      {
        name: 'VPS range',
        value: '30 m',
        icon: '/assets/feat04.svg'
      }
    ],
    categories: ['Drone'],
    tags: ['CONTROLLER', 'DRONEFLY', 'DRONEPHOTOGRAPHY', 'FLYMORE', 'KIT', 'MAVICPRO']
  })
})

// Reactive data
const selectedImage = ref(props.productData.images[0].large)
const quantity = ref(1)

// Methods
const increaseQuantity = () => {
  if (quantity.value < props.productData.stock) {
    quantity.value++
  }
}

const decreaseQuantity = () => {
  if (quantity.value > 1) {
    quantity.value--
  }
}

const addToCart = () => {
  // Add to cart logic here
  console.log(`Added ${quantity.value} ${props.productData.name} to cart`)
}

// Function to get star array for rendering
const getStars = (rating: number) => {
  const stars = []
  const fullStars = Math.floor(rating)
  const hasHalfStar = rating % 1 >= 0.5
  
  for (let i = 0; i < fullStars; i++) {
    stars.push('full')
  }
  if (hasHalfStar) {
    stars.push('half')
  }
  while (stars.length < 5) {
    stars.push('empty')
  }
  
  return stars
}
</script>


<template>
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-36 min-[1025px]:pt-36 min-[1025px]:pb-36" style="background-image: url('/assets/sectionbg_wrapper-03.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      
      <div class="flex flex-wrap -m-3.5">
        
        <!-- Product Images Section -->
        <div class="w-full md:w-1/2 px-4">
          <div class="relative">
            
            <!-- Sale Badge -->
            <Badge 
              v-if="productData.isOnSale" 
              class="absolute -left-2 -top-2 z-10 bg-indigo-900 text-white text-base font-bold min-w-[3.236em] min-h-[3.236em] rounded-full flex items-center justify-center"
            >
              Sale!
            </Badge>

            <!-- Zoom Button -->
            <Button 
              variant="outline" 
              size="icon"
              class="absolute right-2 top-2 z-20 bg-white text-indigo-900 w-9 h-9 rounded-full hover:bg-indigo-50"
            >
              <Search class="w-4 h-4" />
            </Button>

            <!-- Main Image Gallery -->
            <div class="relative w-full mb-8">
              
              <!-- Main Image -->
              <div class="mb-4">
                <img 
                  :src="selectedImage || productData.images[0].large" 
                  :alt="productData.name"
                  class="w-full h-auto max-w-full cursor-pointer rounded-lg"
                />
              </div>

              <!-- Thumbnail Images -->
              <div class="flex flex-wrap -m-2">
                <div 
                  v-for="(image, index) in productData.images" 
                  :key="index"
                  class="w-1/4 p-2"
                >
                  <img 
                    :src="image.thumbnail" 
                    :alt="`${productData.name} thumbnail ${index + 1}`"
                    @click="selectedImage = image.large"
                    :class="[
                      'w-full h-auto max-w-full cursor-pointer rounded border-2 transition-all duration-200',
                      selectedImage === image.large ? 'border-indigo-900' : 'border-transparent hover:border-indigo-300'
                    ]"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Product Details Section -->
        <div class="w-full md:w-1/2 px-4">
          <div class="min-[1025px]:pl-10 min-[1230px]:pl-16">
            
            <!-- Product Name -->
            <h1 class="text-zinc-800 text-[2.50rem] leading-none font-bold pb-6 -mt-2">
              {{ productData.name }}
            </h1>

            <!-- Price -->
            <div class="text-indigo-900 text-[1.63rem] leading-8 mb-6">
              <span 
                v-if="productData.originalPrice" 
                class="text-zinc-500 text-lg line-through mr-3"
              >
                $ {{ productData.originalPrice }}
              </span>
              <span class="font-bold">
                $ {{ productData.salePrice || productData.price }}
              </span>
            </div>

            <!-- Availability -->
            <div class="mt-7 text-lg">
              Availability: 
              <span class="text-indigo-900 font-medium ml-2">
                {{ productData.stock }} in stock
              </span>
            </div>

            <!-- Divider -->
            <div class="w-full h-px bg-zinc-300 my-9"></div>

            <!-- Description -->
            <div>
              <p class="mt-3 leading-relaxed">
                {{ productData.description }}
              </p>
              
              <!-- Features -->
              <ul class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <li 
                  v-for="feature in productData.features" 
                  :key="feature.name"
                  class="flex items-start space-x-5"
                >
                  <div class="w-12 h-12 flex-shrink-0">
                    <img 
                      :src="feature.icon" 
                      :alt="feature.name"
                      class="w-full h-auto"
                    />
                  </div>
                  <div>
                    <span class="text-indigo-900 text-base font-medium">
                      {{ feature.name }}
                    </span>
                    <br />
                    <span class="text-zinc-800 text-xl font-semibold mt-1.5 block">
                      {{ feature.value }}
                    </span>
                  </div>
                </li>
              </ul>
            </div>

            <!-- Product Meta Information -->
            <div class="space-y-8 mt-8">
              
              <!-- Category -->
              <div class="border-t border-zinc-300 pt-8">
                <div class="flex flex-col min-[1025px]:flex-row min-[1025px]:items-center">
                  <div class="text-zinc-800 text-xl font-bold w-32 pb-5 min-[1025px]:pb-0">
                    Category
                  </div>
                  <div class="text-indigo-900">
                    <ul class="list-disc list-inside">
                      <li 
                        v-for="category in productData.categories" 
                        :key="category"
                        class="inline-block mr-4"
                      >
                        <a :href="`/category/${category.toLowerCase()}`" class="underline hover:no-underline">
                          {{ category }}
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Tags -->
              <div class="border-t border-zinc-300 pt-8">
                <div class="flex flex-col min-[1025px]:flex-row min-[1025px]:items-center">
                  <div class="text-zinc-800 text-xl font-bold pb-5 min-[1025px]:pb-0 min-[1025px]:w-32">
                    Tags
                  </div>
                  <div class="flex flex-wrap gap-2">
                    <Badge 
                      v-for="tag in productData.tags" 
                      :key="tag"
                      variant="secondary"
                      class="text-base px-3 py-1"
                    >
                      {{ tag }}
                    </Badge>
                  </div>
                </div>
              </div>

              <!-- Ratings -->
              <div class="border-t border-zinc-300 pt-8">
                <div class="flex flex-col min-[1025px]:flex-row min-[1025px]:items-center">
                  <div class="text-zinc-800 text-xl font-bold w-32 pb-5 min-[1025px]:pb-0">
                    Ratings
                  </div>
                  <div class="flex items-center gap-0.5">
                    <!-- Star Rating -->
                    <Icon 
                      v-for="(star, index) in getStars(productData.rating)" 
                      :key="`star-${index}`"
                      :icon="star === 'full' ? 'mdi:star' : star === 'half' ? 'mdi:star-half-full' : 'mdi:star-outline'"
                      class="w-5 h-5 text-yellow-400"
                    />
                  </div>
                </div>
              </div>

              <!-- Quantity and Add to Cart -->
              <div class="border-t border-zinc-300 pt-8">
                <div class="flex flex-col min-[1025px]:flex-row min-[1025px]:items-center">
                  <div class="text-zinc-800 text-xl font-bold pb-5 min-[1025px]:pb-0 min-[1025px]:w-32">
                    Quantity
                  </div>
                  <div class="flex items-center space-x-5 w-full min-[1025px]:ml-10">
                    <!-- Quantity Selector -->
                    <div class="bg-white rounded-3xl border-2 border-zinc-200 flex items-center">
                      <Button 
                        variant="outline" 
                        size="icon"
                        @click="decreaseQuantity"
                        :disabled="quantity <= 1"
                        class="rounded-l-3xl border-0 hover:bg-zinc-50"
                      >
                        <Minus class="w-4 h-4" />
                      </Button>
                      <Input 
                        v-model="quantity"
                        type="number"
                        min="1"
                        :max="productData.stock"
                        class="w-24 h-16 text-center border-0 focus-visible:ring-0"
                      />
                      <Button 
                        variant="outline" 
                        size="icon"
                        @click="increaseQuantity"
                        :disabled="quantity >= productData.stock"
                        class="rounded-r-3xl border-0 hover:bg-zinc-50"
                      >
                        <Plus class="w-4 h-4" />
                      </Button>
                    </div>

                    <!-- Add to Cart Button -->
                    <Button 
                      class="bg-indigo-900 hover:bg-indigo-800 text-white font-bold py-1 px-9 h-16 rounded-3xl flex items-center space-x-2 min-w-[11rem]"
                      @click="addToCart"
                    >
                      <ShoppingCart class="w-5 h-5" />
                      <span>Add to cart</span>
                    </Button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tabs Section -->
  <section class="text-zinc-500 text-lg py-24 min-[576px]:pt-36 min-[576px]:pb-32 min-[1025px]:pt-36 min-[1025px]:pb-32 bg-white">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      <div>
        <ul class="content-start items-start border-b-zinc-300 border-b-2 flex-wrap justify-start flex list-none border-solid font-bold uppercase">
          <li class="list-item -mb-0 text-indigo-900">
            <a href="#tab-title-description" class="rounded-tl rounded-tr pb-6 px-3 pt-3 min-[576px]:pt-3 min-[576px]:pr-5 min-[576px]:pb-6 min-[576px]:pl-5"> Description </a>
          </li>
          <li class="list-item -mb-0 text-zinc-400">
            <a href="#tab-title-additional_information" class="rounded-tl rounded-tr pb-6 px-3 pt-3 min-[576px]:pt-3 min-[576px]:pr-5 min-[576px]:pb-6 min-[576px]:pl-5"> Additional information </a>
          </li>
        </ul>
        <div class="pt-10 min-[576px]:pt-16 min-[576px]:pr-0 min-[576px]:pb-0 min-[576px]:pl-0">
          <div>
            <p class="flex mt-3">Awesome product! River stingray giant danio horn shark flabby whalefish golden dojo. Black angelfish silver carp electric stargazer Atlantic saury ground shark hammerhead shark yellowtail kingfish cow shark Spanish mackerel. Taimen mackerel shark bigmouth buffalo white shark blue gourami paperbone pilot fish anglerfish, electric ray wahoo." Wolf-herring</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>