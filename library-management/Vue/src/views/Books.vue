<template >
    <div class="flex py-10 space-x-10 items-center justify-evenly w-full font-poppins">
      <h1>List of Books </h1>

      <router-link to="/books/create" class="px-4 py-2 bg-violet-200 hover:bg-violet-300  duration-150 rounded">
        Add Book
      </router-link>
    </div>

    <div class="py-10 font-poppins px-32 ">
      <ul class="grid grid-cols-4 gap-y-10" v-if="this.books.length>0">
        <li  v-for="book in books" :key="book.id" class=" flex flex-col justify-center items-center space-y-2">
          <img :src="require(`@/assets/images/${book.img}`)" :alt="book.title" style="max-width: 200px ">
          <h3 class="font-semibold ">{{ book.title }}</h3>
          <p class="text-gray-500">{{ book.author}}</p>
          <p class="font-semibold ">{{ book.price }}$</p>
          <div class="flex space-x-4 py-4">
            <router-link :to="{path:'/books/'+book.id+'/edit'}" class="bg-blue-300 rounded px-4 py-2 hover:bg-blue-600 hover:text-white duration-150">
              Edit
            </router-link>
            <button @click="deleteBook(book.id)" class="bg-red-300 rounded px-4 py-2 hover:bg-red-600 hover:text-white duration-150">Delete</button>
          </div> 

        </li>
      </ul>
      <ul class="text-center" v-else>
        <h2>Loading....</h2>
      </ul>
    </div>
  
</template>

<script>
import axios from 'axios';
export default{
  name:'books',
  data(){
    return{
      books:[]
    } 
  },
  mounted(){
    this.getBooks();
  },
  methods:{
    getBooks(){
      axios.get('http://localhost:8000/api/books').then(res=>{
        this.books=res.data.books
      })
    },
    deleteBook(bookId){
      if(confirm("Are you sure you want to delete this data?")){
        axios.delete('http://localhost:8000/api/books/'+bookId+'/delete').then(res=>{
          alert(res.data.message);
          this.getBooks();
        })
      }
    }
  }
}
</script>