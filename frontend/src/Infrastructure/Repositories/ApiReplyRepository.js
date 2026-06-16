import axiosClient from "../Http/axiosClient";

export default class ApiReplyRepository {

    async createReply(commentId, dto) {
        const response = await axiosClient.post(`/comments/${commentId}/replies`, dto);
        return response.data;
    }
}