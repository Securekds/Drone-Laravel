<script setup lang="ts">
import { ref, computed, watch } from 'vue'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { 
  Select, 
  SelectContent, 
  SelectItem, 
  SelectTrigger, 
  SelectValue 
} from '@/components/ui/select'
import { Badge } from '@/components/ui/badge'
import { Slider } from '@/components/ui/slider'
import { Checkbox } from '@/components/ui/checkbox'
import { Label } from '@/components/ui/label'
import { ShoppingCart, Search } from 'lucide-vue-next'
import { Icon } from '@iconify/vue'

// Define interfaces
interface Product {
  id: number
  name: string
  image: string
  srcset: string
  link: string
  originalPrice: string
  salePrice?: string
  rating?: number
  category: string
}

interface Category {
  name: string
  url: string
  count: number
  isActive: boolean
}

interface PaginationPage {
  number: number
  url: string
  isActive: boolean
}

interface SortOption {
  value: string
  label: string
}

interface ShopData {
  title: string
  products: Product[]
  categories: Category[]
  pagination: {
    pages: PaginationPage[]
  }
  sortOptions: SortOption[]
}

// Define props
interface Props {
  shopData?: ShopData
}

// Default props
const props = withDefaults(defineProps<Props>(), {
  shopData: () => ({
    title: 'Shop',
    products: [
      {
        id: 1,
        name: 'DJI Smart Controller',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '*',
        originalPrice: '$349.00',
        salePrice: '$249.00',
        rating: 4.33,
        category: 'Dji googles'
      },
      {
        id: 2,
        name: 'Mavic 2 Pro',
        image: '/assets/product_img-01.jpg',
        srcset: '/assets/product_img-01.jpg',
        link: '*',
        originalPrice: '$550.00',
        salePrice: '$400.00',
        rating: 4.5,
        category: 'Drone'
      },
      {
        id: 3,
        name: 'DJI Goggles RE',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '#',
        originalPrice: '$449.00',
        salePrice: '$399.00',
        rating: 4.7,
        category: 'Dji googles'
      },
      {
        id: 4,
        name: 'Phantom 4 Pro',
        image: '/assets/product_img-01.jpg',
        srcset: '/assets/product_img-01.jpg',
        link: '#',
        originalPrice: '$1,599.00',
        salePrice: '$1,299.00',
        rating: 4.8,
        category: 'Phantom'
      },
      {
        id: 5,
        name: 'DJI Spark',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '#',
        originalPrice: '$399.00',
        salePrice: '$299.00',
        rating: 4.2,
        category: 'Spark'
      },
      {
        id: 6,
        name: 'Ronin-S Gimbal',
        image: '/assets/product_img-01.jpg',
        srcset: '/assets/product_img-01.jpg',
        link: '#',
        originalPrice: '$699.00',
        salePrice: '$599.00',
        rating: 4.6,
        category: 'Ronin'
      },
      {
        id: 7,
        name: 'Industrial Inspection Drone',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '#',
        originalPrice: '$2,499.00',
        rating: 4.9,
        category: 'Industrial'
      },
      {
        id: 8,
        name: 'Mavic Air 2',
        image: '/assets/product_img-01.jpg',
        srcset: '/assets/product_img-01.jpg',
        link: '#',
        originalPrice: '$799.00',
        salePrice: '$699.00',
        rating: 4.4,
        category: 'Drone'
      },
      {
        id: 9,
        name: 'Phantom 3 Standard',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '#',
        originalPrice: '$499.00',
        salePrice: '$399.00',
        rating: 4.1,
        category: 'Phantom'
      },
      {
        id: 10,
        name: 'Ronin 2 Gimbal',
        image: '/assets/product_img-01.jpg',
        srcset: '/assets/product_img-01.jpg',
        link: '#',
        originalPrice: '$4,999.00',
        rating: 5.0,
        category: 'Ronin'
      },
      {
        id: 11,
        name: 'Spark Mini',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '#',
        originalPrice: '$299.00',
        salePrice: '$249.00',
        rating: 4.0,
        category: 'Spark'
      },
      {
        id: 12,
        name: 'Industrial Mapping Drone',
        image: '/assets/product_img-01.jpg',
        srcset: '/assets/product_img-01.jpg',
        link: '#',
        originalPrice: '$3,999.00',
        rating: 4.7,
        category: 'Industrial'
      },
      {
        id: 13,
        name: 'DJI FPV Goggles',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '#',
        originalPrice: '$549.00',
        salePrice: '$449.00',
        rating: 4.6,
        category: 'Dji googles'
      },
      {
        id: 14,
        name: 'Mavic Mini',
        image: '/assets/product_img-01.jpg',
        srcset: '/assets/product_img-01.jpg',
        link: '#',
        originalPrice: '$399.00',
        salePrice: '$349.00',
        rating: 4.3,
        category: 'Drone'
      },
      {
        id: 15,
        name: 'Generic Drone Accessory',
        image: '/assets/product_img-06.jpg',
        srcset: '/assets/product_img-06.jpg',
        link: '#',
        originalPrice: '$99.00',
        rating: 3.8,
        category: 'Uncategorized'
      }
    ],
    categories: [
      { name: 'Dji googles', url: '#', count: 2, isActive: false },
      { name: 'Drone', url: '#', count: 3, isActive: false },
      { name: 'Industrial', url: '#', count: 2, isActive: false },
      { name: 'Phantom', url: '#', count: 2, isActive: false },
      { name: 'Ronin', url: '#', count: 2, isActive: false },
      { name: 'Spark', url: '#', count: 2, isActive: false },
      { name: 'Uncategorized', url: '#', count: 1, isActive: false }
    ],
    pagination: {
      pages: [
        { number: 1, url: 'https://quadrone.ninetheme.com/shop/', isActive: true },
        { number: 2, url: 'https://quadrone.ninetheme.com/shop/page/2/', isActive: false }
      ]
    },
    sortOptions: [
      { value: 'default', label: 'Default sorting' },
      { value: 'price-low', label: 'Price: Low to High' },
      { value: 'price-high', label: 'Price: High to Low' },
      { value: 'popularity', label: 'Popularity' },
      { value: 'rating', label: 'Average rating' }
    ]
  })
})

// Reactive data
const selectedSort = ref('default')
const priceRange = ref([200, 799])
const minPrice = ref(200)
const maxPrice = ref(799)
const onSale = ref(false)
const selectedCategory = ref<string | null>('Dji googles')
const currentPage = ref(1)
const productsPerPage = 5

// Create local reactive copy of categories with computed counts
const categories = computed(() => {
  return props.shopData.categories.map(category => ({
    ...category,
    count: props.shopData.products.filter(
      product => product.category === category.name
    ).length,
    isActive: category.name === selectedCategory.value
  }))
})

// Computed property to filter products by category
const filteredProducts = computed(() => {
  let products = props.shopData.products
  if (selectedCategory.value) {
    products = products.filter(product => product.category === selectedCategory.value)
  }
  return products
})

// Computed property for paginated products
const paginatedProducts = computed(() => {
  const start = (currentPage.value - 1) * productsPerPage
  const end = start + productsPerPage
  return filteredProducts.value.slice(start, end)
})

// Computed property for total pages
const totalPages = computed(() => {
  return Math.ceil(filteredProducts.value.length / productsPerPage)
})

// Function to generate pagination pages
const paginationPages = computed(() => {
  const pages = []
  for (let i = 1; i <= totalPages.value; i++) {
    pages.push({
      number: i,
      isActive: i === currentPage.value
    })
  }
  return pages
})

// Function to go to a specific page
const goToPage = (page: number) => {
  currentPage.value = page
}

// Function to go to next page
const nextPage = () => {
  if (currentPage.value < totalPages.value) {
    currentPage.value++
  }
}

// Function to go to previous page
const prevPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--
  }
}

// Watch for category changes to reset to page 1
watch(selectedCategory, () => {
  currentPage.value = 1
})

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

// Function to handle category click
const selectCategory = (categoryName: string) => {
  if (selectedCategory.value === categoryName) {
    selectedCategory.value = null // Deselect if clicking the same category
  } else {
    selectedCategory.value = categoryName
  }
}
</script>



<template>
  <section class="text-zinc-500 text-lg py-12" style="background-image: url('https://quadrone.ninetheme.com/wp-content/uploads/2019/11/sectionbg_wrapper-03.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
      
      <!-- Header Section -->
      <div class="flex flex-col min-[1025px]:flex-row min-[1025px]:justify-between min-[1025px]:items-center pb-12">
        <h1 class="text-[2.50rem] leading-none font-bold text-zinc-800 pb-5 min-[1025px]:pb-0">
          {{ shopData.title }}
        </h1>
        
        <div class="flex items-center justify-start text-base font-semibold">
          <div class="min-[1025px]:inline-block min-[1025px]:ml-5">
            <Select v-model="selectedSort">
              <SelectTrigger class="w-[180px]">
                <SelectValue placeholder="Default sorting" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem 
                  v-for="sortOption in shopData.sortOptions" 
                  :key="sortOption.value"
                  :value="sortOption.value"
                >
                  {{ sortOption.label }}
                </SelectItem>
              </SelectContent>
            </Select>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="flex flex-wrap -m-3.5">
        
        <!-- Products Grid -->
        <div class="w-full md:w-2/3 px-4">
          <div class="flex flex-wrap -m-3.5">
            
            <!-- Product Cards -->
            <div 
              v-for="product in paginatedProducts" 
              :key="product.id"
              class="w-full sm:w-1/2 px-3.5 mt-8"
            >
              <Card class="group bg-white relative overflow-hidden hover:shadow-lg transition-all duration-300">
                <CardContent class="p-0">
                  
                  <!-- Product Image -->
                  <div class="overflow-hidden">
                    <a :href="product.link" class="block">
                      <img 
                        :src="product.image" 
                        :alt="product.name"
                        :srcset="product.srcset"
                        class="w-full h-auto max-w-full cursor-pointer hover:scale-105 transition-transform duration-300"
                      />
                    </a>
                  </div>
                  
                  <!-- Product Info -->
                  <div class="px-7 pt-6 min-[1025px]:p-7 pb-0 md:pb-6 min-[1025px]:pb-7 transition-all duration-300 md:group-hover:pb-20">
                    
                    <!-- Price and Rating -->
                    <div class="flex items-center justify-between mb-4">
                      <div class="flex items-center space-x-2">
                        <!-- Sale Price -->
                        <template v-if="product.salePrice">
                          <span class="text-indigo-900 line-through opacity-70 text-xl">
                            {{ product.originalPrice }}
                          </span>
                          <span class="text-indigo-900 text-xl font-semibold">
                            {{ product.salePrice }}
                          </span>
                        </template>
                        
                        <!-- Regular Price -->
                        <template v-else>
                          <span class="text-indigo-900 text-xl font-semibold">
                            {{ product.originalPrice }}
                          </span>
                        </template>
                      </div>
                      
                      <!-- Rating Stars -->
                      <div v-if="product.rating" class="flex items-center gap-0.5">
                        <Icon 
                          v-for="(star, index) in getStars(product.rating)" 
                          :key="`star-${product.id}-${index}`"
                          :icon="star === 'full' ? 'mdi:star' : star === 'half' ? 'mdi:star-half-full' : 'mdi:star-outline'"
                          class="w-5 h-5 text-yellow-400"
                        />
                      </div>
                    </div>
                    
                    <!-- Product Name -->
                    <h3 class="text-zinc-800 text-[1.63rem] leading-8 font-semibold">
                      {{ product.name }}
                    </h3>
                    
                    <!-- Add to Cart Button - Hidden by default on desktop, shown on hover. Always visible on mobile -->
                    <div class="mt-4 md:absolute md:bottom-0 md:left-0 md:right-0 md:px-7 min-[1025px]:px-7 md:pb-6 min-[1025px]:md:pb-7 md:opacity-0 md:group-hover:opacity-100 md:transform md:translate-y-4 md:group-hover:translate-y-0 transition-all duration-300 md:mt-0 pb-6">
                      <Button class="w-full bg-indigo-900 hover:bg-indigo-800">
                        <ShoppingCart class="w-4 h-4 mr-2" />
                        Add to Cart
                      </Button>
                    </div>
                  </div>
                </CardContent>
              </Card>
            </div>

            <!-- Pagination -->
            <div v-if="totalPages > 1" class="w-full px-4 mt-16">
              <div class="flex justify-center items-center gap-2">
                <button
                  @click="prevPage"
                  :disabled="currentPage === 1"
                  :class="[
                    'w-10 h-10 border-2 rounded-full flex items-center justify-center font-semibold transition-colors duration-200',
                    currentPage === 1
                      ? 'text-zinc-300 border-zinc-200 cursor-not-allowed'
                      : 'text-zinc-400 border-zinc-200 hover:border-indigo-900 hover:text-indigo-900 cursor-pointer'
                  ]"
                >
                  ←
                </button>
                <button
                  v-for="page in paginationPages"
                  :key="page.number"
                  @click="goToPage(page.number)"
                  :class="[
                    'w-10 h-10 border-2 rounded-full flex items-center justify-center font-semibold transition-colors duration-200 cursor-pointer',
                    page.isActive 
                      ? 'bg-indigo-900 text-white border-indigo-900' 
                      : 'text-zinc-400 border-zinc-200 hover:border-indigo-900 hover:text-indigo-900'
                  ]"
                >
                  {{ page.number }}
                </button>
                <button
                  @click="nextPage"
                  :disabled="currentPage === totalPages"
                  :class="[
                    'w-10 h-10 border-2 rounded-full flex items-center justify-center font-semibold transition-colors duration-200',
                    currentPage === totalPages
                      ? 'text-zinc-300 border-zinc-200 cursor-not-allowed'
                      : 'text-zinc-400 border-zinc-200 hover:border-indigo-900 hover:text-indigo-900 cursor-pointer'
                  ]"
                >
                  →
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="w-full md:w-1/3 px-4 mt-8 max-[991px]:mt-10">
          <Card class="bg-white">
            <CardContent class="p-8">
              
              <!-- Categories -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold mb-6">
                  Categories
                </h4>
                <div class="space-y-2">
                  <div 
                    v-for="category in categories" 
                    :key="category.name"
                    :class="[
                      'rounded-r-3xl py-4 pl-16 pr-24 relative w-full transition-colors duration-200 cursor-pointer',
                      category.isActive 
                        ? 'bg-indigo-900 text-white' 
                        : 'text-indigo-900 hover:bg-gray-100'
                    ]"
                    @click="selectCategory(category.name)"
                  >
                    <span class="block font-medium">
                      {{ category.name }}
                    </span>
                    <span class="absolute right-8 top-1/2 transform -translate-y-1/2 text-sm">
                      {{ category.count }}
                    </span>
                  </div>
                </div>
              </div>

              <!-- Search -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold mb-6">
                  Search
                </h4>
                <form class="flex">
                  <Input 
                    type="text" 
                    placeholder="Search for..." 
                    class="h-16 px-6 border-2 border-gray-300 border-r-0 rounded-none"
                  />
                  <Button type="submit" class="h-16 px-6 bg-indigo-900 hover:bg-indigo-800 rounded-r-lg rounded-l-none">
                    <Search class="w-5 h-5" />
                  </Button>
                </form>
              </div>

              <!-- Price Filter -->
              <div class="mb-16">
                <h4 class="text-gray-900 text-[1.63rem] leading-8 font-bold mb-6">
                  Filter by Price
                </h4>
                
                <!-- Price Range Slider -->
                <Slider 
                  v-model="priceRange"
                  :max="1000"
                  :step="10"
                  class="mb-8"
                />
                
                <!-- Price Inputs -->
                <div class="flex items-center justify-between space-x-4 mb-6">
                  <div class="flex-1">
                    <Label for="min-price" class="sr-only">Minimum Price</Label>
                    <Input 
                      id="min-price"
                      v-model="minPrice"
                      type="number"
                      placeholder="Min"
                      class="h-11"
                    />
                  </div>
                  <span class="font-bold">-</span>
                  <div class="flex-1">
                    <Label for="max-price" class="sr-only">Maximum Price</Label>
                    <Input 
                      id="max-price"
                      v-model="maxPrice"
                      type="number"
                      placeholder="Max"
                      class="h-11"
                    />
                  </div>
                </div>

                <!-- Sale Filter -->
                <div class="flex items-center space-x-2 mb-6">
                  <Checkbox id="on-sale" v-model="onSale" />
                  <Label for="on-sale" class="cursor-pointer font-medium">
                    On Sale
                  </Label>
                </div>

                <!-- Filter Button -->
                <Button class="w-full bg-indigo-900 hover:bg-indigo-800 h-12 rounded-3xl">
                  Filter
                </Button>
              </div>
            </CardContent>
          </Card>
        </div>
      </div>
    </div>
  </section>
</template>





















