import axiosClient from "../Http/axiosClient";

export default class ApiAuthRepository {

    async login(dto) {
        const response = await axiosClient.post("/login", dto);
        return response.data;
    }

    async register(dto) {
        const response = await axiosClient.post("/register", dto);
        return response.data;
    }

    async logout() {
        const response = await axiosClient.post("/logout");
        return response.data;
    }

    async me() {
        const response = await axiosClient.get("/me");
        return response.data;
    }
}