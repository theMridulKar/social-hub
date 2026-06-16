import axiosClient from "../Http/axiosClient";

export default class ApiCommentRepository {

    async createComment(dto) {

        const response =
            await axiosClient.post(
                `/posts/${dto.postId}/comments`,
                {
                    content: dto.content,
                }
            );

        return response.data;
    }
}