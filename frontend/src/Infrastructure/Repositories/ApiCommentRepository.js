import axiosClient from "../Http/axiosClient";

export default class ApiCommentRepository {
    async createComment(postId, dto) {
        const response = await axiosClient.post(`/posts/${postId}/comments`, dto);
        return response.data;
    }
}