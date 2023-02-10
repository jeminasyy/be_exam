import { ref } from "vue"
import axios from "axios"
import { useRouter } from "vue-router"

export default function useProducts() {
    const products = ref([]);
    const product = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getProducts = async () => {
        // const response = await axios.get("http://localhost:8000/api/products");
        const response = await axios.get("/api/products");
        products.value = response.data.data;
    };

    const getProduct = async (id) => {
        const response = await axios.get("/api/products/" + id );
        product.value = response.data.data;
    }

    const storeProduct = async (data) => {
        try {
            await axios.post("/api/products/store", data);
            await router.push({name: 'ProductIndex'});
        } catch (error) {
            if(error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateProduct = async (id) => {
        try {
            await axios.put("/api/products/" + id, product.value)
            await router.push({name: 'ProductIndex'});
        } catch (error) {
            if(error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyProduct = async (id) => {
        if(!window.confirm("Are you Sure?")) {
            return;
        }
        await axios.delete("/api/products/" + id);
        await getProducts();
    }

    return {
        products,
        product,
        getProducts,
        getProduct,
        storeProduct,
        updateProduct,
        destroyProduct,
        errors
    };
}