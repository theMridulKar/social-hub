export default class CreateCommentDTO {

    constructor(
        postId,
        content
    ) {
        this.postId =
            postId;

        this.content =
            content;
    }
}