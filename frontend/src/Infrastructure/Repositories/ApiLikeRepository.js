import axiosClient from "../Http/axiosClient";

export default class ApiLikeRepository {
    async togglePostLike(postId) {
        const response = await axiosClient.post(`/posts/${postId}/like`);
        return response.data;
    }

    async toggleCommentLike(commentId) {
        const response = await axiosClient.post(`/comments/${commentId}/like`);
        return response.data;
    }

    async toggleReplyLike(replyId) {
        const response = await axiosClient.post(`/replies/${replyId}/like`);
        return response.data;
    }
}