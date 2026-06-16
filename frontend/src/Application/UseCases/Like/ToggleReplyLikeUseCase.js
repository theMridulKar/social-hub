export default class ToggleReplyLikeUseCase {

    constructor(
        likeRepository
    ) {
        this.likeRepository =
            likeRepository;
    }

    async execute(replyId) {

        return await this
            .likeRepository
            .toggleReplyLike(
                replyId
            );
    }
}