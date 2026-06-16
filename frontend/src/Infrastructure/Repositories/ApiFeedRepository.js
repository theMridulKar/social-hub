import axiosClient from "../Http/axiosClient";

export default class ApiFeedRepository {

    async getFeed() {
        const response = await axiosClient.get("/feed");
        return response.data;
    }
}