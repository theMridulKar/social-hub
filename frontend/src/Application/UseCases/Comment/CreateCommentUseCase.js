export default class CreateCommentUseCase {

    constructor(
        commentRepository
    ) {
        this.commentRepository =
            commentRepository;
    }

    async execute(dto) {

        return await this
            .commentRepository
            .createComment(
                dto
            );
    }
}