import FeedItem from "./FeedItem";

export default function FeedList({feeds, loading}) {

    if (loading) {
        return <p>Loading feed...</p>;
    }

    if (!feeds.length) {
        return <p>No posts found.</p>;
    }

    return (
        <>
            {feeds.map((feed) => (
                <FeedItem
                    key={feed.id}
                    feed={feed}
                />
            ))}
        </>
    );
}