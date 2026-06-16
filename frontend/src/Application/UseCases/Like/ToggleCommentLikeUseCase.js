export default class ToggleCommentLikeUseCase {

    constructor(
        likeRepository
    ) {
        this.likeRepository =
            likeRepository;
    }

    async execute(commentId) {

        return await this
            .likeRepository
            .toggleCommentLike(
                commentId
            );
    }
}