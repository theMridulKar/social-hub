import axiosClient from "../Http/axiosClient";

export default class ApiPostRepository {

    async createPost(dto) {
        const response = await axiosClient.post("/create-post", dto);
        return response.data;
    }
}