export default class TogglePostLikeUseCase {

    constructor(likeRepository) {

        this.likeRepository =
            likeRepository;
    }

    async execute(postId) {

        return await this
            .likeRepository
            .togglePostLike(
                postId
            );
    }
}