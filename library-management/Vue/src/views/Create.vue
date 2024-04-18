
<template>
<body class="p-6 font-poppins">

    <h1 class="font-semibold mb-6 text-center uppercase text-slate-700 mt-10">Add New Book</h1>

    <div class="max-w-md mx-auto">

        <ul class="bg-red-100 text-left my-10 p-4 text-md rounded text-gray-600"  v-if="Object.keys(this.errorList).length>0">
            <li v-for="(error,index) in this.errorList" :key="index">
                {{ error[0] }}

            </li>
        </ul>
        <label for="title" class="block mb-2">Book Title:</label>
        <input v-model="model.book.title" type="text" id="title" name="title" required maxlength="191"
            class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:outline-none focus:border-blue-400">

        <label for="author" class="block mb-2">Author:</label>
        <input v-model="model.book.author"  type="text" id="author" name="author" required maxlength="191"
            class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:outline-none focus:border-blue-400">

        <label for="description" class="block mb-2">Description:</label>
        <textarea v-model="model.book.description" id="description" name="description" required maxlength="1000"
            class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:outline-none focus:border-blue-400"></textarea>

        <label for="price" class="block mb-2">Price:</label>
        <input v-model="model.book.price"  type="number" id="price" name="price" required max="191"
            class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:outline-none focus:border-blue-400">

        <label for="img" class="block mb-2">Image URL:</label>
        <input v-model="model.book.img"  type="text" id="img" name="img" required maxlength="191"
            class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:outline-none focus:border-blue-400">

        <input   type="submit" @click="saveBook" value="Submit" class="bg-green-300 cursor-pointer hover:bg-green-600 hover:text-white  py-2 px-4 rounded duration-150">
    </div>

</body>

</template>

<script>
import axios from "axios";
export default{
    name:"bookCreate",
    data(){
        return{
            errorList: {},
            model:{
                book:{
                    title:'',
                    author:'',
                    description:'',
                    price:'',
                    img:'',
                }
            }
        }
    },
    methods:{
        saveBook(){
            var mythis=this;
            axios.post('http://localhost:8000/api/books',this.model.book)
            .then(res=>{
                console.log(res.data)
                alert(res.data.message);
                mythis.model.book={
                    title:'',
                    author:'',
                    description:'',
                    price:'',
                    img:'',
                }
                this.errorList="";
            }).catch((error) => {
    if (error.response.status == 422) {
        this.errorList = error.response.data.errors;
    } else if (error.request) {
        console.log(error.request);
    } else {
        console.log('Error', error.message);
    }
    console.log(error.config);
})
                    }
    },
}
</script>